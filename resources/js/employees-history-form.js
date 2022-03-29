import Vue from 'vue'

new Vue({
    el: '#block-form-template',
    data: {
    	histories: histories,
        deleted_histories: []
    },
    methods: {
    	addBlock() {
            this.histories.push({
              title: '',
              content: ''
            });
        },
        deleteBlock(_index) {
            var _ = this;
            this.histories = this.histories.filter(function(value, index, arr){
                if (index == _index && value.id) {
                    _.deleted_histories.push(value.id);
                }
              return index != _index;
            });
        }
    }
});
