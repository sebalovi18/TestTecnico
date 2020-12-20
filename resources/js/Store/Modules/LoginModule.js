import router from '../../Router/index'
const LoginModule = {
    namespaced : true,
    state : {},
    getters : {

    },
    actions : {
        async signIn({state}, user){
            await axios.post(`${window.location.origin}/api/login` , user)
                    .then(resp=>{
                        window.localStorage.setItem('access_token' , resp.data.access_token);
                        window.localStorage.setItem('email' , resp.data.email);
                        router.push('/news');
                    })
                    .catch(err=>{
                        console.log(err)
                    })
        }
    }
}

export default LoginModule;