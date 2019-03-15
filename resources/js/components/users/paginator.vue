<template lang="pug">
  nav(v-if='pagination.total > offset')
    ul.pagination.pagination-lg.justify-content-center
      li.page-item(v-if='pagination.current_page')
        a.page-link(href='#', aria-label='Previous', @click.prevent='changePage(pagination.current_page - 1)')
          span(aria-hidden='true') «
      li.page-item(v-for='(page, index) in pagesNumber', :class="[page == isActived ? 'active' : '']", :key='index')
        a.page-link(href='#', @click.prevent='changePage(page)', v-text='page')
      li.page-item(v-if='pagination.current_page < pagination.last_page')
        a.page-link(href='#', aria-label='Next', @click.prevent='changePage(pagination.current_page + 1)')
          span(aria-hidden='true') »
</template>

<script>
	
	export default {
    
    props:{
      offset: {
        type: Number,
        required: true
      }
    },
		
		computed: {

      pagination(){
        return this.$store.getters.pagination;
      },

			isActived() {
        return this.pagination.current_page;
      },

			pagesNumber() {
          let from = this.pagination.current_page - this.offset;
          let to = from + (this.offset * 2);
          let pagesArray = [];

          if (!this.pagination.to) {
              return [];
          }
          if (from < 1) {
              from = 1;
          }
          if (to >= this.pagination.last_page) {
              to = this.pagination.last_page;
          }
          while (from <= to) {
              pagesArray.push(from);
              from++;
          }
          return pagesArray;
      }
		},

		methods:{
			
      changePage(page) {
          
          this.$store.dispatch('changePage', page);
          
          this.$store.dispatch('getUsers');

      }
		}
	}

</script>