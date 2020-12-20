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
            await axios.get(`${window.location.origin}/api/news` , 
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

        async setFavouriteNews({state},news)
        {
            await axios.post(`${window.location.origin}/api/news` ,
            {
                data : {
                    name : news.name,
                    link : news.link,
                    email : window.localStorage.getItem('email')
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