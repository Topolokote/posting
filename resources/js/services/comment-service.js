import axios from 'axios'

class Service{
    postComment(data){
        return axios.post('/post-comment', data);
    }

    getComments(data){
        console.log(data);
        return axios.get('/get-comments',{params:data});
    }
}

export const CommentService = new Service();