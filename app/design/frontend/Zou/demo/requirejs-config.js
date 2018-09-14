var config = {
	paths: {
        'owlcarousel': "js/OwlCarousel2-2.3.4/dist/owl.carousel.min",  //paths下就是定义JS库名和JS库路径。
        // 'bootstrap': "js/bootstrap.min",
    },
    shim: {    //上面js库的依赖
        'owlcarousel': {
            deps: ['jquery']
        },
        // 'bootstrap': {
        //     deps: ['jquery']
        // }
    },
   	deps: [   //引入自定义Js
        "js/demo"
   	]
};