var webpack = require('webpack');
var path = require('path');
var autoprefixer = require('autoprefixer');
var ExtractTextPlugin = require('extract-text-webpack-plugin');
var HtmlWebpackPlugin = require('html-webpack-plugin');
var CleanWebpackPlugin = require('clean-webpack-plugin')
var environment = 'production';

module.exports = {
    entry: {
        m: './src/mobile/index.jsx',
        c: './src/customercenter/index.jsx'
    },
    output: {
        path: path.resolve(__dirname, '../../static/'),
        publicPath: '//static.couqiao.me/',
        filename: '[name].bundle.[hash].js'
    },
    module: {
        loaders:[
            {
                test: /\.js[x]?$/,
                exclude: /node_modules/,
                loader: 'babel-loader',
                query: {
                    presets: ['react', 'es2015', 'stage-0']
                }
            }, {
                test: /\.less$/,
                loader: 'style!css!postcss!less'
            }, {
                test: /\.css/,
                loader: ExtractTextPlugin.extract('style', 'css', 'postcss')
            }, {
                test: /\.(png|jpg|svg)$/,
                loader: 'url?limit=25000'
            }
        ]
    },
    postcss: [autoprefixer],
    plugins: [
        new CleanWebpackPlugin('static/*.*', {
            root: path.resolve(__dirname, '../../')
        }),
        new ExtractTextPlugin('[name].style.[hash].css'),
        new webpack.DefinePlugin({
            "process.env": {
                NODE_ENV: JSON.stringify(environment)
            }
        }),
        new webpack.optimize.UglifyJsPlugin({
            comments: false
        }),
        new HtmlWebpackPlugin({
            filename: path.resolve(__dirname, '../Siegelion/Application/MobilePortal/View/default/home.html'),
            chunks: ['m'],
            template: 'public.ejs'
        }),
        new HtmlWebpackPlugin({
            filename: path.resolve(__dirname, '../Siegelion/Application/CustomerCenter/View/default/home.html'),
            chunks: ['c'],
            template: 'public.ejs'
        })
    ]
};