const path=require('path');
const MiniCssExtractPlugin=require('mini-css-extract-plugin');
const {CleanWebpackPlugin}=require('clean-webpack-plugin');
const OptimizeCSSAssetsPlugin=require('optimize-css-assets-webpack-plugin');
const cssnano=require('cssnano'); //http://cssnano.co
const UglifyJsPlugin=require('uglifyjs-webpack-plugin');

const JS_DIR=path.resolve(__dirname,'src/js');
const IMG_DIR=path.resolve(__dirname,'src/img');
const BUILD_DIR=path.resolve(__dirname,'build');

const entry={
    main:JS_DIR + '/main.js',
    single:JS_DIR + '/single.js',
    editor:JS_DIR + '/editor.js'
};

const output={
    path:BUILD_DIR,
    filename:'js/[name].js'
};

const rules=[
    {
        test:/\.js$/,
        include:[JS_DIR],
        exclude:/node_modules/,
        use:'babel-loader'
    },
    {
        test:/\.scss$/,
        exclude:/node_modules/,
        use:[
            MiniCssExtractPlugin.loader,
            'css-loader',
            'sass-loader'
        ]
    },
    {
        test:/\.(png|jpg|svg|jpeg|gif|ico)$/,
        use:{
            loader:'file-loader',
            options:{
                name:'[path][name].[ext]',
                publicPath:'production'=== process.env.NODE_ENV ? '../' : '../../',
            }
        }
    },

    {
		test: /\.(ttf|otf|eot|svg|woff(2)?)(\?[a-z0-9]+)?$/,
		exclude: [ IMG_DIR, /node_modules/ ],
        //type:'asset/inline',
        type: "javascript/auto",
		use: {
			loader: 'file-loader',
			options: {
				name: '[path][name].[ext]',
				publicPath: 'production' === process.env.NODE_ENV ? '../' : '../../',
                esModule: false,
			}
		}
	}


];



const plugins = ( argv ) =>[
	new CleanWebpackPlugin( {
		cleanStaleWebpackAssets: ( 'production' === argv.mode  ) // Automatically remove all unused webpack assets on rebuild, when set to true in production. ( https://www.npmjs.com/package/clean-webpack-plugin#options-and-defaults-optional )
	} ),

	new MiniCssExtractPlugin( {
		filename: 'css/[name].css'
	} )
];     

module.exports=(env,argv)=>(
    {
       entry: entry,
       output:output,
       devtool:'source-map', //false if dont want to generate main.js.map
       module:{
        rules:rules,
       },
       optimization:{
            minimizer:[
                new OptimizeCSSAssetsPlugin({
                    cssProcessor:cssnano,
                }),

                new UglifyJsPlugin({
                    cache:false,
                    parallel:true,
                    sourceMap:false
                })
            ]
       },
       plugins:plugins(argv),
       externals:{
        jquery:'jQuery'
       }

    });

    