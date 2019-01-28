<template>
  <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
            <div class="card-header">Publicado en {{task.created_at}} - Ultima actualizacion: {{task.updated_at}}</div>
            <div class="card-body">
              <input v-if="editMode" type="text" class="form-control" v-model="task.description">
              <p v-else>{{task.description}}</p>
            </div>

            <div class="card-footer">

              <button v-if="editMode" type="button" class="btn btn-success"  @click="onClickUpdate">Guardar</button>
              <button v-else type="button" class="btn btn-default"  @click="onClickEdit">Editar</button>

              <button type="button" class="btn btn-danger" @click="onClickDelete">Eliminar</button>
            </div>
        </div>
      </div>
  </div>
</template>

<script>
    export default {
      props: {
        task: Object,
        default: {}
      },
      data() {
        return {
          editMode: false
        };
      },
      methods: {
        onClickDelete() {
          axios.delete(`/api/task/${this.task.id}`).then(() => this.$emit('delete'));
        },
        onClickEdit() {
          this.editMode = true;
        },
        onClickUpdate() {
          const params = {
            description: this.task.description
          };

          axios.put(`/api/task/${this.task.id}`, params).then(response => {
            const task = response.data;

            this.editMode = false;
            this.$emit('update', task);
          });
        }
      }
    }
</script>
