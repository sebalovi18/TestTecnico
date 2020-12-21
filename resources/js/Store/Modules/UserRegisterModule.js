import router from '../../Router/index'
const UserRegisterModule = {
    namespaced : true ,
    state : {
        errors : {}
    },
    getters : {
        getErrors(state)
        {
            return state.errors;
        }
    },
    actions : {
        async registerUser( {state} , user)
        {
            await axios(`${window.location.origin}/api/register` ,
            {
                method : 'post',
                data : {
                    name : user.name,
                    email : user.email,
                    password : user.password
                },
                headers : {
                    'Accept' : 'application/json',
                    'Content-Type' : 'application/json'
                }
            })
            .then(resp=>{
                router.push('/');
            })
            .catch(err=>{
                if(err.response.status === 422){
                    state.errors = err.response.data.errors;
                }
            })
        }
    }
}

export default UserRegisterModule;