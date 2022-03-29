<template>
  <div class="news2List">
    <ul>
      <li v-for="(newsItem, index) in news">
        <div class="news2Box">
          <div class="news2Image">
            <a :href="newsItem.url">
              <div v-bind:style="{backgroundImage: 'url('+newsItem.image+')'}" class="imgBox"></div>
              <div class="arrowHover"><img src="/images/icons/arrow-ellips.png" alt=""/></div>
            </a>
          </div>
          <div class="news2Title">
            <a :href="newsItem.url">@{{newsItem.title}}</a>
          </div>
          <div class="news2Footer">
            <div class="news2Date">@{{newsItem.date}}</div>
            <div class="itemSN"><a href="#"><i class="icon-fb2"></i></a><a href="#"><i class="icon-vk"></i></a><a href="#"><i class="icon-odno"></i></a><a href="#"><i class="icon-dotted"></i></a></div>
          </div>
        </div>
      </li>
    </ul>
  </div>
</template>

<script>
import axios from 'axios';

    export default {
        data(){
            return {
                test: true
            }
        },
        created(){
            this.getNews();
            console.log(this.$route.params.url)
            console.log(this.news)
        },
        methods:{
            getNews(){
                let newsUrl = this.$route.params.url;
                if (newsUrl) {
                    axios.get('/news-list', {params: {url:newsUrl, page: this.page}})
                    .then(response => {
                        this.news = response.data.news;
                        console.log(this.news);
                    })
                    .catch(error => console.log('error',error))
                    .finally(() => (this.loader = false));
                }
            },
            loadMode(){
                this.loader = true;
                this.page++;
                let newsUrl = this.$route.params.url;
                if (newsUrl) {
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
                }
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
