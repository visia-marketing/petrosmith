<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */

function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');



/**
 * Clean up the_excerpt()
 */

function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'visia_starter_theme') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');



/**
 * Move Yoast to Bottom
 */

 function yoasttobottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio',  __NAMESPACE__ . '\\yoasttobottom');



/*
 * Add Gravity Form Events to GA4
 */

add_action('gform_after_submission', 'send_ga4_server_event', 10, 2);
function send_ga4_server_event($entry, $form) {

    $measurement_id = 'G-NY598NTE4V';
    $api_secret = 'CtZ2SI0NRIuN8khPwrnUlw';

    // Retrieve Client ID from the _ga cookie (Critical for attribution)
    $client_id = null;
    if (isset($_COOKIE['_ga'])) {
        // format is usually GA1.2.123456789.123456789
        $parts = explode('.', $_COOKIE['_ga']);
        if (isset($parts[2]) && isset($parts[3])) {
            $client_id = $parts[2] . '.' . $parts[3];
        }
    }
    // Fallback if cookie is missing (e.g., ad blockers)
    if (!$client_id) {
        $client_id = uniqid('gform_', true);
    }

    // Retrieve Session ID (Optional but recommended for "Realtime" view context)
    $session_id = null;
    // Cookie name is usually _ga_<container_id>
    $container_id_clean = str_replace('G-', '', $measurement_id);
    $cookie_key = '_ga_' . $container_id_clean;
    if (isset($_COOKIE[$cookie_key])) {
        $parts = explode('.', $_COOKIE[$cookie_key]);
        // Session ID is the 3rd part; strip non-numeric chars to handle format variations (e.g. GS2.1.xxx)
        if (isset($parts[2])) {
            $session_id = preg_replace('/\D/', '', $parts[2]) ?: null;
        }
    }

    // Create Event Name
    // sanitize_title uses hyphens; underscores are preferred in GA4
    $slug = str_replace('-', '_', sanitize_title($form['title']));
    $event_name = 'form_submit_' . $slug;

    // Build Payload
    $event_params = [
        'form_id'            => $form['id'],
        'form_name'          => $form['title'],
        'page_location'      => !empty($entry['source_url']) ? $entry['source_url'] : home_url(),
        'engagement_time_msec' => 1, // Required for events to appear in standard GA4 reports
    ];

    // Add Session ID if found
    if ($session_id) {
        $event_params['session_id'] = (int) $session_id;
    }

    $payload = [
        'client_id' => $client_id,
        'events' => [[
            'name'   => $event_name,
            'params' => $event_params
        ]]
    ];

    // Send to GA4
    $url = "https://www.google-analytics.com/mp/collect?measurement_id=$measurement_id&api_secret=$api_secret";

    $response = wp_remote_post($url, [
        'method'      => 'POST',
        'blocking'    => false, // Don't make the user wait
        'headers'     => ['Content-Type' => 'application/json'],
        'body'        => wp_json_encode($payload),
        'timeout'     => 5,
    ]);

    // Note: Because 'blocking' => false, we cannot log the $response error message 
    // because WordPress drops the connection immediately.
}



