import Vue from 'vue'
import axios from 'axios';

new Vue({
    el: '#mistape',
    data: {
        modalStyles: {
            display: 'block'
        },
        model: {
        	errorText: "",
        	url: "",
            comments: "",
            _token: ""
        },
        showWindowFlag: false,
        loader: false,
    },
    watch:{
    },
    updated(){
        var body = document.getElementsByTagName('body')[0];
        if (this.showWindowFlag) {
            body.classList.add("openedModal");
        }else{
            body.classList.remove("openedModal");
        }
    },
    mounted() {
        var _ = this;
        document.onkeyup = function(e) {
            if((e.ctrlKey) && ((e.keyCode==10)||(e.keyCode==13))) 
            {
                _.showWindow();
            }
            if (e.keyCode==27) {
                _.closeWindow();
            }
        }
    },
    methods: {
    	showWindow(){
            this.model.errorText = window.getSelection().toString();
            this.model.url = window.location.href;
            this.showWindowFlag = true;
    	},
        submit(){
            this.model._token = document.querySelector('input[name="_token"]').value;
            if (this.model.comments) {
                this.loader = true;
                axios.post('/ru/send-text-error', this.model)
                .then(response => {
                    this.closeWindow();
                })
                .catch(error => console.log('error',error))
                .finally(() => (this.loader = false));
            }
        },
        closeWindow(){
            this.showWindowFlag = false;
            this.model.comments = "";
        }
    }
});
