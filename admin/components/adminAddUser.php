<div class="add-user-form-container">
    <div class="close-icon-container">
        <div>
            <h4>Create new account</h4>
        </div>
    </div>
    <form action="../includes/addAccount_includes.php" method="post">
        <div class="addAccountInput_field_container">
            <input type="text" name="name" class="input-field" required placeholder="Enter full name">
        </div>
        <div class="addAccountInput_field_container">
            <select name="usertype" id="usertype" class="input-field" required>
                <option value="" disabled selected>Choose Usertype</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
        </div>
        <div class="addAccountInput_field_container">
            <input type="text" name="email" class="input-field" required placeholder="Enter valid email">
        </div>

        <div class="addAccountInput_field_container">
            <input type="text" name="password" class="input-field" required placeholder="Enter password">
        </div>
        <div class="addAccountInput_field_container ">
            <input type="text" name="confirmPassword" class="input-field" required placeholder="Confirm password">
        </div>
        <div class="addAccount-button">
            <button type="submit" name="add-user" class="add-user">Add</button>
            <button type="button" class="cancel-add-user" id="close-modal">Cancel</button>
        </div>
    </form>
</div>

<style>
    .close-icon-container {
        height: 50px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 2% auto;
        width: 90%;
    }

    .close-modal:hover {
        background-color: lightgray;
    }

    .addAccountInput_field_container {
        margin: 5% auto;
        width: 90%;
    }

    .input-field {
        width: 100%;
        border-radius: 10px;
        outline: none;
        border: 1px solid lightgray;
        font-size: .9em;
        padding: 4px;
    }

    .addAccount-button {
        width: 90%;
        margin: 5% auto;
        display: flex;
        justify-content: flex-end;
        gap: 10px;
    }

    .add-user {
        border: none;
        background-color: #1c065c;
        border-radius: 8px;
        width: 100px;
        color: #fefefe;
    }

    .add-user:hover {
        background-color: darkblue;
    }

    .cancel-add-user {
        border: none;
        background-color: gray;
        border-radius: 8px;
        width: 100px;
        color: #fefefe;
    }

    .add-user:hover {
        background-color: darkblue;
    }
</style>