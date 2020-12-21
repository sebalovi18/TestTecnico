import router from "../../Router/index";
const AuthModule = {
    namespaced: true,
    actions: {
        async signIn({ state }, user) {
            await axios(`${window.location.origin}/api/login`, {
                method: "post",
                data: {
                    email: user.email,
                    password: user.password
                }
            })
            .then(resp => {
                if (resp.status === 200) {
                    window.localStorage.setItem("access_token",resp.data.access_token);
                    router.push("/news");
                }
            })
            .catch(err => {
                console.log(err);
            });
        },
        async logOut({ state }) {
            await axios(`${window.location.origin}/api/logout`, {
                method: "post",
                headers: {
                    Authorization: `Bearer ${window.localStorage.getItem(
                        "access_token"
                    )}`,
                    Accept: "application/json",
                    "Content-Type": "application/json"
                }
            })
            .then(resp => {
                if(resp.status === 200){
                    window.localStorage.clear();
                    router.push("/");
                }
            })
            .catch(resp => {});
        }
    }
};

export default AuthModule;
