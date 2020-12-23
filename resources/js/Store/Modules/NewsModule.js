import router from "../../Router/index";
const NewsModule = {
    namespaced: true,
    state: {
        lastTenNews: null,
        favouriteUserNews: null
    },
    getters: {
        getLastTenNews(state) {
            return state.lastTenNews;
        },
        getFavouriteUserNews(state) {
            return state.favouriteUserNews;
        }
    },
    actions: {
        async setLastTenNews({ state }) {
            await axios(`${window.location.origin}/api/news`, {
                headers: {
                    Authorization: `Bearer ${window.localStorage.getItem(
                        "access_token"
                    )}`,
                    Accept: "application/json",
                    "Content-Type": "application/json"
                }
            }).then(resp => {
                if (resp.status === 200) {
                    state.lastTenNews = resp.data;
                }
            });
        },
        async setFavouriteUserNews({ state }, newsId) {
            await axios(`${window.location.origin}/api/news`, {
                method: "post",
                data: {
                    id: newsId
                },
                headers: {
                    Authorization: `Bearer ${window.localStorage.getItem(
                        "access_token"
                    )}`,
                    Accept: "application/json",
                    "Content-Type": "application/json"
                }
            })
                .then(resp => {
                    if (resp.status === 201) {
                        console.log("Se guardo la noticia");
                    }
                })
                .catch(err => {
                    if (err.response.status === 401) {
                        console.log(
                            "Usted no tiene permisos para guardar noticias"
                        );
                        window.localStorage.clear();
                        router.push({name: 'home'});
                    }
                    if (err.response.status === 422) {
                        console.log(
                            "La noticia que intenta agregar ya se encuentra en su lista de favoritos"
                        );
                    }
                });
        },
        async unsetFavouriteUserNews(context, newsId) {
            await axios(`${window.location.origin}/api/news`, {
                method: "delete",
                data: {
                    id: newsId
                },
                headers: {
                    Authorization: `Bearer ${window.localStorage.getItem(
                        "access_token"
                    )}`,
                    Accept: "application/json",
                    "Content-Type": "application/json"
                }
            })
                .then(resp => {
                    if (resp.status === 204) {
                        context.dispatch("getAllFavouriteUserNews");
                        console.log(
                            "Se ha quitado la noticia de su lista de favoritos"
                        );
                    }
                })
                .catch(err => {
                    if (err.status === 401) {
                        console.log(
                            "Usted no tiene permisos para realizar esta operacion"
                        );
                        window.localStorage.clear();
                        router.push({name: 'home'});
                    }
                });
        },
        async getAllFavouriteUserNews({ state }) {
            await axios(`${window.location.origin}/api/news/user`, {
                headers: {
                    Authorization: `Bearer ${window.localStorage.getItem(
                        "access_token"
                    )}`,
                    Accept: "application/json",
                    "Content-Type": "application/json"
                }
            }).then(resp => {
                if (resp.status === 200) {
                    state.favouriteUserNews = resp.data;
                }
            });
        }
    }
};
export default NewsModule;
