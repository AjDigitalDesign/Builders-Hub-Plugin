<template>
  <div class="container">
  <div class="row">
    <div class="col-lg-5">
      <div class="form-guidelines">
        <h5>Guidelines</h5>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut corporis doloribus praesentium provident repellat! Blanditiis corporis deserunt dolor doloremque eaque excepturi iste minima placeat, possimus repudiandae? Ad dolorem dolores veniam.</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut corporis doloribus praesentium provident repellat! Blanditiis corporis deserunt dolor doloremque eaque excepturi iste minima placeat, possimus repudiandae? Ad dolorem dolores veniam.</p>

      </div>
    </div>
    <div class="col-lg-7">
      <div v-if="hasBeenSubmitted" class="form-success">
        <h1>Thank You!</h1>
      </div>
      <div v-else class="form-area">
        <form ref="form" @submit.prevent="sendEmail">
          <div class="form-fields">
            <div class="mb-3">
              <label class="form-label">Company Name</label>
              <input
                  type="text"
                  name="user_name"
                  placeholder="Company's Name"
                  class="form-control"
              >
            </div>

            <div class="mb-3">
              <label class="form-label">Email</label>
              <input
                  type="email"
                  name="user_email"
                  placeholder="Email"
                  class="form-control"
              >
            </div>

            <div class="mb-3">
              <label class="form-label">Phone</label>
              <input
                  type="number"
                  name="user_phone"
                  placeholder="Phone Number"
                  class="form-control"
              >
            </div>

            <div class="mb-3">
              <label class="form-label">Website</label>
              <input
                  type="url"
                  name="user_website"
                  placeholder="Website URL"
                  class="form-control"
              >
            </div>

            <div class="mb-3">
              <label class="form-label">Priority</label>
              <select name="user_priority" id="" class="form-select" >
                <option value="low" selected>Low</option>
                <option value="Normal">Normal</option>
                <option value="Important">Important</option>
                <option value="Critical">Critical</option>
              </select>
            </div>

            <div class="mb-3">
              <label class="form-label">Page(s) Impacted</label>
              <input
                  type="url"
                  name="user_pageURL"
                  placeholder="URL to page being impacted"
                  class="form-control"
              >
            </div>

            <div class="mb-3">
              <label class="form-label">Message</label>
              <textarea
                  name="message"
                  cols="30"
                  rows="5"
                  placeholder="Describe the issues"
              >
             </textarea>
            </div>
          </div>
          <input type="submit" value="Send" >
        </form>
      </div>
    </div>

  </div>
  </div>

</template>

<script>
import emailjs from '@emailjs/browser';
export default {
  name: "ServiceRequestForm",
  data(){
    return {
      hasBeenSubmitted: false
    }
  },

  methods: {
    sendEmail(){
        emailjs.sendForm('service_88bk30n', 'template_8sunmrt', this.$refs.form, 'CMGfV7bbxOTuGcf-8')
        .then((result) => {
          this.hasBeenSubmitted = true
        }, (error) => {
          console.log('FAILED...', error.text);
        });

    },
  },
}
</script>

<style lang="scss" scoped>
  .form-area{
    position: relative;
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
    .form-fields{
      label {
        text-align: left;
      }
      input[type=text], [type=email],[type=number], [type=url],textarea {
        width: 100%;
        //padding: 5px;
        //border: 1px solid #ccc;
        //border-radius: 4px;
        //box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        border: none;
        padding: 0;
        background: transparent;
        color: rgba(0, 0, 0, 0.8);
        border-radius: 0;
        border-bottom: 1px solid #4e73df;
        resize: vertical;
        &:focus{
          //outline: none;
          //border: 0;
          border-bottom: 1px solid #4e73df;
          box-shadow: none;
        }
      }
      select{
        border-color: #4e73df;
      }
    }
  }

  input[type=submit] {
    background-color: #4e73df;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  input[type=submit]:hover {
    background-color: #e14d43;
  }
</style>