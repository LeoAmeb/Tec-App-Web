<template>
    <footer class="footer">
    <div class="container-fluid">
        <div class="copyright">
            {{date}}, Leonardo Amaya
        </div>
    </div>
    </footer>
</template>

<script>
export default {
    name: 'Footer',
    data(){
        return{
            date: new Date().getFullYear()
        } 
    }
}
</script>