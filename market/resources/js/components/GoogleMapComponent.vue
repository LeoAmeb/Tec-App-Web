<template>
  <div>
    <div class="card">
      <div class="form-group">
        <div class="card">
          <div class="card-header card-header-warning">
            <h4 class="card-title">Direccion</h4>
          </div>
          <div class="card-body">
          <gmap-autocomplete id="inputAddress" class="form-control map-input" @place_changed="setPlace"></gmap-autocomplete>
          <input value="Agregar ubicación" type="button" class="btn btn-primary" @click="addMarker" />
          </div>
        </div>
      </div>
    </div>

    <gmap-map :center="center" :zoom="12" style="width:100%;  height: 400px;">
      <gmap-marker
        :position="marker"
        @click="center=marker"
      ></gmap-marker>
      <!--<gmap-marker
        :key="index"
        v-for="(m, index) in markers"
        :position="m.position"
        @click="center=m.position"
      ></gmap-marker>-->
    </gmap-map>
  </div>
</template>

<script>
export default {
  name: "GoogleMap",
  props: {
    parentData: "",
  },
  data() {
    return {
      // default to Montreal to keep it simple
      // change this to whatever makes sense
      center: { lat: 45.508, lng: -73.587 },
      markers: [],
      places: [],
      marker: {
        lat: 0,
        lng: 0,
      },
      currentPlace: null,
    };
  },

  mounted() {
    this.geolocate();
    this.addAddress();
  },

  methods: {
    // receives a place object via the autocomplete component
    setPlace(place) {
      this.currentPlace = place;
    },
    addAddress(){
      var that = this;
      if(this.parentData.length>0){
        
        that.setPlace(that.parentData);
        that.addMarker();  
      }
    },
    addMarker() {
      if (this.currentPlace) {
        const marker = {
          lat: this.currentPlace.geometry.location.lat(),
          lng: this.currentPlace.geometry.location.lng(),
        };
        this.marker = marker;
        //this.markers.push({ position: marker });
        //this.places.push(this.currentPlace);
        this.center = marker;
        this.$emit("childToParent", this.currentPlace);
        this.currentPlace = null;
      }
    },
    geolocate: function () {
      navigator.geolocation.getCurrentPosition((position) => {
        this.center = {
          lat: position.coords.latitude,
          lng: position.coords.longitude,
        };
      });
    },
  },
};
</script>