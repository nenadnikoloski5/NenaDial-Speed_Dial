<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card card-default">
          <div v-if="saveBtnShow" id="saveBtn">
            <form action="saveItems" method="post">
              <input type="hidden" name="_token" :value="csrf">
              <input type="hidden" name="items" :value="JSON.stringify(items)">
              
              <button type="submit" class="myButton">Save</button>
            </form>
          </div>

          <div v-if="addShow" id="addNew">
            <p id="addNewP">Add a new site</p>
            <input v-model="addInput" id="AddNewInput" type="text" placeholder="Enter link">
            <button @click="add" id="AddNewBtn">Add</button>
          </div>

          <ul id="loopUl">
            <a
              @click="deThis($event)"
              @mouseover="mouseOver($event)"
              @mouseleave="mouseLeave($event)"
              v-for="(item, index) in items"
              :key="index"
              :href="item.url"
              class="aTag"
            >
              <li class="loopUl">{{item.justName}}</li>
              <i :style="{visibility:ifVis}" class="fas fa-times-circle"></i>
            </a>

            <li @click="addShow=!addShow" class="loopUl defaultUl">Add a new site</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["userItems"],
  data: function() {
    return {
      freed: Object.values(this.userItems),

      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      items: [],
      addInput: "",
      addShow: false,
      showOption: false,
      ifVis: "hidden",
      saveBtnShow: false
    };
  },
  methods: {
    add() {
      //   If it's not a proper link
      if (this.addInput.slice(0, 4) !== "www.") {
        this.addInput = "http://www." + this.addInput + ".com";
        this.saveBtnShow = true;
      }

      // If it has no https, add it
      if (this.addInput.slice(0, 4) !== "http") {
        this.addInput = "http://" + this.addInput;
        this.saveBtnShow = true;
      }

      this.items.push({
        url: this.addInput,
        justName: this.addInput.match(/\.(.*?)\.co/i)[1]
      });

      this.addInput = "";
      this.addShow = false;
    },
    mouseOver(e) {
      if (e.target.className == "loopUl") {
        e.target.nextElementSibling.attributes[1].value = "visibility: initial";
      }
    },
    mouseLeave(e) {
      if (e.target.localName == "a") {
        e.target.children[1].attributes[1].value = "visibility: hidden";
      }
    },
    deThis(e) {
      if (e.target.localName == "i") {
        e.preventDefault();

        // deleting from this.items
        this.items.forEach((element, index) => {
          console.log(
            e.target.previousElementSibling.textContent,
            element.justName
          );
          if (e.target.previousElementSibling.textContent == element.justName) {
            this.items.splice(index, 1);
          }
        });

        // if no elements, hide save Btn
        if (this.items.length == 0) {
          this.saveBtnShow = false;
        }
      }
    }
  },
  mounted() {
    for (let i = 0; i < this.freed.length; i++) {
      this.items.push({
        id: this.freed[i].id,
        created_at: this.freed[i].created_at,
        itemToUserID: this.freed[i].itemToUserID,
        justName: this.freed[i].justName,
        updated_at: this.freed[i].updated_at,
        url: this.freed[i].url
      });
    }
  }
};
</script>


