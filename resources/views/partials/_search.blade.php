<form action="/courses">
    <div class="input-group my-4">
        <i class="fa fa-search fa-2x"></i>
        <input
            type="text"
            name="search"
            class="form-control form-control-lg search-input"
            placeholder="Search for anything"
        />
    </div>
</form>
<style>
    .search-input {
        border: none;
        height: 60px;
        color: #484b4c;
        background-color: #191a1b;
    }
    .search-input:focus {
        border: none;
        box-shadow: none;
        color: whitesmoke !important;
        height: 60px;
        color: #484b4c;
        background-color: #191a1b;
    }
    .input-group {
        border-radius: 30px;
        border: 2px solid #484b4c;
        background-color: #191a1b;
        padding: 0 30px;
        display: flex;
        align-items: center;
    }
    .fa-search {
        /* position: absolute;
        left: 50px;
        top: 25px;
        background-color: red !important; */
        color: #484b4c;
        margin-right: 10px;
    }
</style>