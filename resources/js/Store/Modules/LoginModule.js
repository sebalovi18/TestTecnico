import router from '../../Router/index'
const LoginModule = {
    namespaced : true,
    actions : {
        async signIn({state}, user){
            await axios(`${window.location.origin}/api/login` , 
            {
                method : 'post',
                data : {
                    email : user.email,
                    password : user.password
                }
            })
            .then(resp=>{
                window.localStorage.setItem('access_token' , resp.data.access_token);
                router.push('/news');
            })
            .catch(err=>{
                console.log(err)
            })
        }
    }
}

export default LoginModule;