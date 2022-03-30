<template>
  <ServiceHeader />
  <ServiceRequestForm />

</template>

<script>
import ServiceHeader from "../Components/ServiceRequest/ServiceHeader";
import ServiceRequestForm from "../Components/ServiceRequest/ServiceRequestForm";
export default {
  name: "serviceRequest",
  components: {
    ServiceHeader,
    ServiceRequestForm
  }
}
</script>

<style scoped>

</style>