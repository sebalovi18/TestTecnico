<template>
    <b-row no-gutters>
        <b-col>
            <b-table
            :items="getFavouriteUserNews"
            :fields="fields"
            striped
            small
            hover
            empty-text="No hay noticias guardadas"
            responsive="lg"
            table-variant="light"
            > 
                <template #cell(indice)="data">
                    {{data.index}}
                </template>
                <template #cell(url)="data">
                    <a :href="data.item.url" target="_blank">{{data.item.url}}</a>
                </template>
                <template #cell(actions)="data">
                    <b-icon icon="trash" variant="danger" class="icon-button" @click="unsetFavouriteUserNews(data.item.id)"></b-icon>
                </template>
            </b-table>
        </b-col>
    </b-row>
</template>
<script>
import {mapActions , mapGetters} from 'vuex';
export default {
    data(){
        return {
            fields : [
                "indice",
                {
                    key : 'title',
                    label : 'Title',
                    sortable : true , 
                },
                {
                    key : 'url',
                    label : 'Link',
                    sortable : true
                },
                'actions'

            ]
        }
    },
    computed:{
        ...mapGetters('NewsModule' , ['getFavouriteUserNews'])
    },
    methods:{
        changeStatus(){
            this.flag = !this.flag
        },
        ...mapActions('NewsModule' , ['getAllFavouriteUserNews', 'unsetFavouriteUserNews'])
    },
    mounted() {
      this.getAllFavouriteUserNews();
    },
}
</script>
<style scoped>
.icon-button{
    cursor: pointer;
}
</style>