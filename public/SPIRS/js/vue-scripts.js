new Vue({
  el: '#additional-phones',
  data: {
    models: [{
      "value":""
    }],
    deleteds: []
  },
  updated:function(){
    setTimeout(function(){
      phoneFormat();
    },5);
  },
  methods: {
    add(){
      this.models.push({
        "value":""
      });
      console.log(this.models);
    },
    deleteBlock(_index) {
      this.models = this.models.filter((value, i, arr) => {
        if (i == _index && value.id) {
          this.deleteds.push(value.id);
        }
        return i != _index;
      });
    }
  }
});

new Vue({
  el: '#additional-position',
  data: {
    models: [{
      "position_name":"",
      "count":""
    }],
    deleteds: []
  },
  methods: {
    add(){
      this.models.push({
        "position_name":"",
        "count":""
      });
      setTimeout(function(){
        select2();
      },5);
    },
    deleteBlock(_index) {
      this.models = this.models.filter((value, i, arr) => {
        if (i == _index && value.id) {
          this.deleteds.push(value.id);
        }
        return i != _index;
      });
    }
  }
});

new Vue({
  el: '#mfoInput',
  data: {
    mfo: "",
    bankTitle:""
  },
  methods: {
    inputMfo(){
      this.mfo = String(this.mfo).substring(0, 5);
      if (this.mfo.length == 5) {
        let mfo = this.mfo;
        let bankTitle = "";
        banks.forEach(function(bank){
          if (bank.MFO == mfo) {
            bankTitle = bank.Name;
          }
        })
        this.bankTitle = bankTitle;
      }else{
        this.bankTitle = "";
      }
    },
  }
});

new Vue({
  el: '#toggle-buttons',
  data: {
    toggle: null,
  },
  methods: {
  }
});