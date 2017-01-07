Vue.component('tasks',{
    props:['list'],

    template: '#tasks-template'
});


var $comm = new Vue({
    el:'#my_comment',
    data: {
        text:"Hello",
        date:"06.01.2017",
        user:"Alexander",

    // масив задачи
        tasks:[
            {body: "Сходить в магазин", completed: false},
            {body: "Заехать в банк",    completed: false},
            {body: "Заехать к маме",    completed: true}
        ]
    },

})