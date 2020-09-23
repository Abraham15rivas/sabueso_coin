<template>

    <l-map style="height: 700px" :zoom="zoom" :center="center">

        <l-tile-layer 
            :url="url"
            :attribution="attribution">
        </l-tile-layer>

        <l-control-attribution 
            position="topright" 
            prefix="Mapa de puntos glufco">
        </l-control-attribution>  

        <l-marker 
            :lat-lng="company.upn_coordinates | parseArray"
            :icon="icon">

            <l-popup>
                <div @click="companyImg(company)">
                    <p class="text-dark" v-text="company.description"></p>
                    <a href="#">Imagenes</a>
                </div>
            </l-popup>

            <l-tooltip 
                :options="options" 
                :content="company.name">
            </l-tooltip>

        </l-marker>

    </l-map>

</template>
<script>

import { latLng,icon } from "leaflet";
export default {
  props: ['company'],
  data () {
    return {
      attribution:'&copy; <a href="http://www.instagram.com/abraham.r.j" target="_blank">@abraham.r.j</a> contributors',
      url: 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
      zoom: 14,
      center: this.company.upn_coordinates.split(','),
      markerLatLng: '',
      icon: icon({
        iconUrl: "img/icons/dog.svg",
        iconSize: [32, 37],
        iconAnchor: [16, 37]
      }),
      options: { 
        permanent: false, 
        interactive: true 
      }
    };
  },
  methods: {
    companyImg(company) {
        alert('proximamente')
    }
  },
  filters: {
    parseArray: function (value) {
      if (!value) return ''
      parseInt(value)
      value = value.split(',');
      return value
    }
  }
}

</script>