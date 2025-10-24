const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const WebpackBar = require('webpackbar');
const webpack = require('webpack');

module.exports = {
    entry: {
        main: [
            './assets/src/scripts/main.js',
            './assets/src/styles/main.scss'
        ],
        admin: [
            './assets/src/styles/admin.scss'
        ]
    },
    devtool: 'source-map',
    output: {
        filename: 'assets/dist/scripts/[name].min.js',
        path: path.resolve(__dirname)
    },
    resolve: {
        alias: {
            'jquery': 'jquery/src/jquery',
            'foundation': 'foundation-sites/js/foundation.core',
            'slick-carousel': 'slick-carousel/slick/slick.js'
        }
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['@babel/preset-env']
                    }
                }
            },
            {
                test: /\.scss$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    'css-loader',
                    'postcss-loader',
                    {
                        loader: 'sass-loader',
                        options: {
                            sassOptions: {
                                includePaths: [
                                    path.resolve(__dirname, 'node_modules/foundation-sites/scss'),
                                    path.resolve(__dirname, 'assets/src/styles')
                                ]
                            }
                        }
                    }
                ]
            },
            {
                test: /\.(woff|woff2|eot|ttf|otf)$/,
                type: 'asset/resource',
                generator: {
                  filename: 'webfonts/[name][ext]'
                }
            },
            {
                test: /\.(png|jpg|jpeg|gif|svg)$/,
                type: 'asset/resource',
                generator: {
                    filename: 'assets/dist/styles/images/[name][ext]'
                }
            }
        ]
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: 'assets/dist/styles/[name].min.css'
        }),
        new WebpackBar({
            name: 'build',
            color: '#00ff00',
        }),
        new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery',
            'window.jQuery': 'jquery',
            'window.$': 'jquery'
        })
    ],
    stats: {
        assets: true,
        assetsSort: "size",
        children: false,
        chunks: true,
        chunkModules: false,
        modules: false,
        warnings: false,
        performance: true,
        excludeAssets: [/assets\/dist\/styles\/fonts/, /assets\/dist\/styles\/images/],
    },
};