import Vue from 'vue'
import axios from 'axios';
require('es6-promise').polyfill();

new Vue({
    el: '#speech',
    data: {
        text: "",
        lang: "ru",
        style: {
            position: "absolute",
            left: "0px",
            top: "0px",
        },
        showFlag: false,
        loader: false,
        playing: false,
        audio: null,
        textArr: [],
    },
    watch:{
    },
    updated(){
        // var body = document.getElementsByTagName('body')[0];
        // if (this.showFlag) {
        //     body.classList.add("openedModal");
        // }else{
        //     body.classList.remove("openedModal");
        // }
    },
    mounted() {
        this.onInit();
    },
    methods: {
        onInit(){
            this.lang = document.getElementsByTagName('html')[0].lang;
            var _ = this;
            document.onmouseup = function(e) {
                setTimeout(() => {
                    if (window.getSelection().toString().length > 2) {
                        if (!_.showFlag) {
                            _.style.top = e.pageY+"px";
                            _.style.left = e.pageX+"px";
                        }
                        _.text = window.getSelection().toString();
                        _.getTexts(_.text);
                        _.showFlag = true;
                    }else{
                        _.showFlag = false;
                        _.loader = false;
                        _.playing = false;
                        if (_.audio) {
                            _.audio.pause();
                        }
                    }
                },100);
                return false;
            }
        },
        play(){
            this.playEach(this.textArr[0], 0);
        },
        playEach(text, index){
            if(text){
                var _ = this;
                if (!_.playing) {
                    _.loader = true;
                    axios.post('/ru/speech', {text:text, lang:_.lang})
                    .then(response => {
                        if (response.data.audio) {
                            _.playing = true;
                            _.audio = new Audio(response.data.audio);
                            _.audio.play();
                            _.audio.onended = function() {
                                if (_.textArr[index+1]) {
                                    console.log(_.textArr[index+1]);
                                    _.playing = false;
                                    _.playEach(_.textArr[index+1], index+1);
                                }else{
                                    _.playing = false;
                                    _.loader = false;
                                    _.showFlag = false;
                                }
                            };
                        }else{
                            _.loader = false;
                            _.showFlag = false;
                            _.playing = false;
                        }
                    })
                    .catch(error => {
                        console.log('error',error);
                        _.playing = false;
                        _.loader = false;
                        _.showFlag = false;
                    });
                }
            }
        },
        getTexts(){
            let textArr = this.text.split(" ");
            let newArr = [];
            let arr = [];
            let i = 0;
            textArr.forEach(item => {
                arr.push(item);
                i++;
                if (i == 10) {
                    newArr.push(arr.join(" "));
                    i = 0;
                    arr = [];
                }else{
                    if (item == textArr[textArr.length -1]) {
                        newArr.push(arr.join(" "));
                    }
                }
            })
            this.textArr = newArr;
        }
    }
});
