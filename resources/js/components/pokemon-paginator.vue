<template>
   <nav v-if="pagination.total > offset">
        <ul class="pagination pagination-lg justify-content-center">
            <li v-if="pagination.current_page" class="page-item">
                <a href="#" aria-label="Previous" @click.prevent="changePage(pagination.current_page - 1)" class="page-link">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li v-for="page in pagesNumber" :class="[page == isActived ? 'active' : '']" class="page-item">
                <a href="#" @click.prevent="changePage(page)" v-text="page" class="page-link"></a>
            </li>
            <li v-if="pagination.current_page < pagination.last_page" class="page-item">
                <a href="#" aria-label="Next" @click.prevent="changePage(pagination.current_page + 1)" class="page-link">
                    <span aria-hidden="true">»</span>
                </a>
          </li>
        </ul>
    </nav>
</template>

<script>
	
	export default {
		
		props:['pagination', 'offset'],
		
		computed: {
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
            },
		},

		methods:{
			changePage(page) {
				this.$emit('changepage', page)
			}
		}
	}

</script>