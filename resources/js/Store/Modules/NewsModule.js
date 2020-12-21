const NewsModule = {
    namespaced : true,
    state : {
        lastTenNews : null,
        favouriteUserNews : null,
    },
    getters : {
        getLastTenNews(state)
        {
            return state.lastTenNews;
        },
        getFavouriteUserNews(state)
        {
            return state.favouriteUserNews;
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
        async unsetFavouriteUserNews(context,newsId)
        {
            await axios(`${window.location.origin}/api/news`, 
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
            context.dispatch('getAllFavouriteUserNews');
        },
        async getAllFavouriteUserNews({state})
        {
            await axios(`${window.location.origin}/api/news/user` , 
            {   
                headers:{
                    'Authorization' : `Bearer ${window.localStorage.getItem('access_token')}`,
                    'Accept' : 'application/json',
                    'Content-Type' : 'application/json'
                }
            })
            .then(resp=>{
                state.favouriteUserNews = resp.data;
            })
            .catch(err=>console.log(err))
        }
    }
}
export default NewsModule;