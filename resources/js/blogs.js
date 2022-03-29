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

const blogs = new Vue({
	router: router,
    el: '#BlogsPage',
    data: {
    	loader: true,
        firstBlogs: false,
    	blogs: [],
    	page: 1,
    	lastPage: false,
    },
    created(){
        this.getBlogs();
    },
    watch:{
        $route (to, from){
            this.getBlogs();
        }
    },
    updated(){
    },
    methods: {
    	getBlogs(){
            this.loader = true;
            this.page = 1;
            this.lastPage = false;
            axios.get('/blogs-list', {params: {page: this.page}})
            .then(response => {
                this.firstBlogs = response.data.blogs[0];
                if (response.data.blogs.length > 1) {
                    response.data.blogs.splice(0, 1);
                    this.blogs = response.data.blogs;
                }
                this.setWindowScrollTop();
                if (this.page == response.data.lastPage) {
                    this.lastPage = true;
                }
            })
            .catch(error => console.log('error',error))
            .finally(() => (this.loader = false));
    	},
    	loadMode(){
    		this.loader = true;
    		this.page++;
			axios.get('/blogs-list', {params: {page: this.page}})
	    	.then(response => {
	    		response.data.blogs.forEach(item => {
		    		this.blogs.push(item);
	    		})
	    		if (this.page == response.data.lastPage) {
	    			this.lastPage = true;
	    		}
	    	})
			.catch(error => console.log('error',error))
	        .finally(() => (this.loader = false));
    	},
        setWindowScrollTop(){
            var elem = document.getElementById("blogList");
            window.scrollTo({
                top: (elem.offsetTop - 200),
                behavior: "smooth"
            });
        }
    }
});
