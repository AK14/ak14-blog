new Vue ({
    el: '#comm',

    ready: function(){
        this.fetchComments();
    },

    methods: {
        fetchComments: function(){
            this.$http.get('comments',function(comments){
                this.$set('comments',comments);
            });
        }
    }
})

