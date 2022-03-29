import Vue from 'vue'
import VueRouter from 'vue-router';
import axios from 'axios';

Vue.use(VueRouter);

const routes = [
  { path: '/:url' },
];

const router = new VueRouter({
  routes
})

const news = new Vue({
	router: router,
    el: '#NewsPage',
    data: {
    	loader: true,
    	categories: [],
        firstNews: false,
    	news: [],
    	page: 1,
    	lastPage: false,
    },
    created(){
    	this.getCategories();
    },
    watch:{
        $route (to, from){
            this.getNews();
        }
    },
    updated(){
    },
    methods: {
    	getCategories(){
    		axios.get('/news-categories')
	    	.then(response => {
	    		this.categories = response.data.categories
	    	})
			.catch(error => console.log('error',error))
	        .finally(() => {
                this.loader = false;
                this.getNews();
            });
    	},
    	getNews(){
            if (this.categories.length) {
                this.loader = true;
                this.page = 1;
                this.lastPage = false;
                let newsUrl = this.$route.params.url;
                if (!newsUrl) {
                    newsUrl = this.categories[0].url;
                }
                axios.get('/news-list', {params: {url:newsUrl, page: this.page}})
                .then(response => {
                    this.firstNews = response.data.news[0];
                    if (response.data.news.length > 1) {
                        response.data.news.splice(0, 1);
                        this.news = response.data.news;
                    }
                    this.setWindowScrollTop();
                    if (this.page == response.data.lastPage) {
                        this.lastPage = true;
                    }
                })
                .catch(error => console.log('error',error))
                .finally(() => (this.loader = false));
            }
    	},
    	loadMode(){
    		this.loader = true;
    		this.page++;
    		let newsUrl = this.$route.params.url;
            if (!newsUrl) {
                newsUrl = this.categories[0].url;
            }
			axios.get('/news-list', {params: {url:newsUrl, page: this.page}})
	    	.then(response => {
	    		response.data.news.forEach(item => {
		    		this.news.push(item);
	    		})
	    		if (this.page == response.data.lastPage) {
	    			this.lastPage = true;
	    		}
	    	})
			.catch(error => console.log('error',error))
	        .finally(() => (this.loader = false));
    	},
        setWindowScrollTop(){
            var elem = document.getElementById("newsList");
            window.scrollTo({
                top: (elem.offsetTop - 200),
                behavior: "smooth"
            });
        }
    }
});
