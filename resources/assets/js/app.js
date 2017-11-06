
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
window.axios = require('axios');
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

const app = new Vue({
    el: '#app',
    data: {
        inputTask: '',
        tasks: []
    },
    mounted: function () {
        this.getTasks(this.tasks);
    },

    methods: {
        getTasks: function (tasks) {
            axios.post('/allTasks').then(function (data) {
                for(var i = 0; i < data['data'].length; i++){
                    tasks.push({id: data['data'][i]['id'], title: data['data'][i]['title'], checked: data['data'][i]['checked'], created_at: data['data'][i]['created_at']})
                }
            })
        },
        makeTask: function (tasks) {
            axios.post('/makeTask', {title: this.inputTask}).then(function (data) {
                this.inputTask = '';
                tasks.push({id: data['data']['id'], title: data['data']['title'], checked: 0});
            });
        },
        updateTask: function (taskID, title, checked) {
            axios.post('/updateTask', {taskID: taskID, title: title, checked: checked});
        },
        deleteTask : function (taskID, index) {
          axios.post('/deleteTask', {taskID: taskID});
            this.tasks.splice(index, 1);
        },
        appendTask: function (taskID, title) {

        },
        editTask: function (taskID) {
            var title = document.getElementById(taskID + 'input').value;
            var checked = document.getElementById(taskID + 'checkbox').checked;
            var checked2;
            if(checked)
                checked2 = 1;
            else
                checked2 = 0;
            this.updateTask(taskID, title, checked2);
        },
        getElementText: function (taskID) {
            return document.getElementById(taskID + "input").value;
        },
        getElementChecked: function (taskID) {
            return document.getElementById(taskID + "checkbox").checked;
        }
    }
});
