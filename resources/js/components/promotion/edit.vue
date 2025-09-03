<template>
  <div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="form-group">
                <label>Tên học bổng</label>
                <vs-input
                type="text"
                size="default"
                placeholder="Tên dịch vụ"
                class="w-100"
                v-model="objData.name"
                :maxlength="60"
              />
              <div class="character-count" style="text-align: right; font-size: 12px; color: #666; margin-top: 5px;">
                <span :class="{'text-danger': nameCharCount > 60}">
                  {{ nameCharCount }}/60 ký tự
                </span>
              </div>
              </div>
              <div class="form-group">
                <label>Mô tả ngắn</label>
                <vs-textarea
                  type="text"
                  size="default"
                  placeholder="Mô tả ngắn"
                  class="w-100"
                  v-model="objData.description"
                  :maxlength="160"
                />
                <div class="character-count" style="text-align: right; font-size: 12px; color: #666; margin-top: 5px;">
                <span :class="{'text-danger': descriptionCharCount > 160}">
                  {{ descriptionCharCount }}/160 ký tự
                </span>
              </div>  
              </div>
              <div class="form-group">
                <label>Nội dung</label>
                <TinyMce
                  v-model="objData.link"
                />
              </div>
              <div class="form-group">
                <label>Ảnh đại diện</label>
                <image-upload v-model="objData.image" type="avatar" :title="'hoc-bong-'"></image-upload>
              </div>
              <div class="form-group">
                <label>Trạng thái</label>
                <vs-select v-model="objData.status"
                  >
                      <vs-select-item  value="1" text="Hiện" />
                      <vs-select-item  value="0" text="Ẩn" />
                    </vs-select>
              </div>
            </div>
            
          </div>
          
        </div>
        
      </div>
      <div class="row fixxed">
        <div class="col-12">
          <div class="saveButton">
            <vs-button color="primary" @click="addPromotions">Lưu</vs-button>
          </div>
        </div>
      </div>
    <!-- content-wrapper ends -->
  </div>
</template>


<script>
import { mapActions } from "vuex";
import TinyMce from "../_common/tinymce";
export default {
  name: "product",
  data() {
    return {
      errors:[],
      cate:[],
      lang:[],
      showLang:{
        title:false,
        content:false,
        description:false
      },
      objData: {
          id: this.$route.params.id,
        name: '',
        description: '',
        status: "",
        image: "",
        link: ""
      }
    };
  },
  components: {TinyMce
  },
  computed: {
    nameCharCount() {
      return this.objData.name ? this.objData.name.length : 0;
    },
    descriptionCharCount() {
      return this.objData.description ? this.objData.description.length : 0;
    }
  },
  watch: {},
  methods: {
    ...mapActions(["addPromotion", "loadings","detailPromotion"]),
    editById() {
      this.loadings(true);
      this.detailPromotion(this.objData).then(response => {
        this.loadings(false);
        if(response.data == null){
          this.objData ={
                    id: this.$route.params.id,
                    name: '',
                    description: '',
                    status: "",
                    image: "",
                    link: ""
                  }
        }else{
          this.objData = response.data;
        }
      }).catch(error => {
        console.log(12);
      });
    },
    addPromotions(){
      this.errors = [];
      if(this.objData.name == '') this.errors.push('Tên không được để trống');
      if(this.objData.description == '') this.errors.push('Mô tả không được để trống');
      if(this.objData.images == '') this.errors.push('Vui lòng chọn ảnh');
      if(this.objData.link == '') this.errors.push('Đường dẫn khônng để trống');
      if (this.errors.length > 0) {
        this.errors.forEach((value, key) => {
          this.$error(value)
        })
        return;
      }else{
        this.loadings(true);
        this.addPromotion(this.objData).then(response => {
          this.loadings(false);
          this.$router.push({name:'listPromotion'});
          this.$success('Thêm khuyến mãi thành công');
        }).catch(error => {
          this.loadings(false);
          this.$error('Thêm khuyến mãi thất bại');
        })
      }
    },
  },
  mounted() {
      this.editById();
  }
};
</script>