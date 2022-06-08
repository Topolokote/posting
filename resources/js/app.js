require('./bootstrap');

import { createApp } from 'vue';

import MainPost from './components/MainPost';


const app = createApp({
    data() {
      return {
        
      }
    },
    components:{
        MainPost
    }
  })

  app.mount('#app');