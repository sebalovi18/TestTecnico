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
            await axios.get(`${window.location.origin}/api/getNews`)
                    .then(resp=>state.lastTenNews = resp.data)
                    .catch(err=>console.log(err))
        }
    }
}
export default NewsModule;