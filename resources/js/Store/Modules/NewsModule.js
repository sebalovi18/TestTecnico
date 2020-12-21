const NewsModule = {
    namespaced : true,
    state : {
        lastTenNews : null,
    },
    getters : {
        getLastTenNews(state)
        {
            return state.lastTenNews;
        }
    },
    actions : {
        async setLastTenNews({state})
        {
            await axios(`${window.location.origin}/api/news` , 
            {   
                headers:{
                    'Authorization' : `Bearer ${window.localStorage.getItem('access_token')}`,
                    'Accept' : 'application/json',
                    'Content-Type' : 'application/json'
                }
            })
            .then(resp=>state.lastTenNews = resp.data)
            .catch(err=>console.log(err))
        },

        async setFavouriteUserNews({state},newsId)
        {
            await axios(`${window.location.origin}/api/news` ,
            {
                method:'post',
                data : {
                    id : newsId
                },
                headers : {
                    'Authorization' : `Bearer ${window.localStorage.getItem('access_token')}`,
                    'Accept' : 'application/json',
                    'Content-Type' : 'application/json'
                }
            })
        },

        async unsetFavouriteUserNews({state},newsId)
        {
            axios(`${window.location.origin}/api/news`, 
            {
                method : 'delete',
                data : {
                    id : newsId
                },
                headers : {
                    'Authorization' : `Bearer ${window.localStorage.getItem('access_token')}`,
                    'Accept' : 'application/json',
                    'Content-Type' : 'application/json'
                }
            })
        }
    }
}
export default NewsModule;