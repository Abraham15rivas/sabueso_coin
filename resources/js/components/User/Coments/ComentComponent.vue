<template>

    <div :class="index | position">

        <p>
            <strong>
                Empresa: {{ coment.company.name }}
                <br>
                Usuario: {{ coment.user.username }}
            </strong>
        </p>
        <q>
            <cite>	
                {{ coment.comments }}
            </cite>
        </q>
        <p>
            <span>
                Calificación:
                <star-rating
                    position="center"
                    read-only 
                    :max-rating="5" 
                    v-model="coment.start" 
                    rounded-corners inactive-color="#dcdcdc" 
                    :glow="0" active-color="#fab802" 
                    :show-rating="false" :star-size="25"
                    >
                </star-rating>
            </span>
        </p>
    </div>

</template>
<script>

import StarRating from 'vue-star-rating'
export default {
    props: ['coment', 'index'],
    components: {
        StarRating
    },
    filters: {
        position(val) {
            let value = val % 2 == 0 ? 'text-left' : 'text-right'
            return value
        }
    }
}
</script>
