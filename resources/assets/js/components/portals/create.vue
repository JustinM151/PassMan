<template>
    <div class="card card-default">
        <div class="card-header">Create Portal</div>

        <div class="card-body">
            <form action="/api/portals" method="post">
                <div class="form-group">
                    <label>Portal Name:</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Portal URL:</label>
                    <input type="text" name="url" class="form-control">
                </div>

                <div class="form-group">
                    <label>Description:</label>
                    <textarea class="form-control" name="description"></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">ADD PORTAL</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: "portals-create"
    }
</script>

<style scoped>

</style>