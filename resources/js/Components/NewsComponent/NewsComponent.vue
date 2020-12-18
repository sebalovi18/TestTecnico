<template>
    <b-row no-gutters>
        <b-col>
         <b-list-group>
                <b-list-group-item v-for="news in getLastTenNews" :key="news.id"
                class="d-flex justify-content-between align-items-center"
                variant="light"
                >
                    {{news.title}}
                    <Favorite-Button />
                </b-list-group-item>
        </b-list-group>
        </b-col>
    </b-row>
</template>
<script>
import {mapActions , mapGetters} from 'vuex';
import FavoriteButton from './FavoriteButton';
export default {
    data(){
        return {

        }
    },
    computed:{
        ...mapGetters('NewsModule' , ['getLastTenNews'])
    },
    methods:{
        changeStatus(){
            this.flag = !this.flag
            console.log(this.flag)
        },
        ...mapActions('NewsModule' , ['setLastTenNews'])
    },
    components: {
        FavoriteButton
    },
    mounted() {
      this.setLastTenNews();
    },
}
</script>