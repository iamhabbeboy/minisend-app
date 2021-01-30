<template>
    <div>
        <Header/>
         <router-link to="/compose" class="btn btn-lg btn-success"> Compose</router-link>
        <br/>
        <Listing />
    </div>
</template>

<script>
import Header from '../components/Header'
import Listing from '../components/Listing'
export default {
    components: {
        Header,
        Listing
    }
};
</script>
