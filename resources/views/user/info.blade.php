<form action="/user/info" method="POST">
    @csrf
    <div>
        <p>What hobby/ies do you have?</p>
        <label for="hobbies"></label>
        <input type="text" id="hobbies" name="hobbies">
        @error('hobbies')
        <div style="background-color: red;">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <p>How many pets do you have?</p>
        <label for="pets"></label>
        <input type="number" id="pets" name="pets">
        @error('pets')
        <div style="background-color: red;">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <p>Do you like milk?</p>
        <label for="milk">Yes</label>
        <input type="radio" id="milk" name="milk" value="1">
        <label for="no-milk">No</label>
        <input type="radio" id="no-milk" name="milk" value="0">
        @error('milk')
        <div style="background-color: red;">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <p>What would you like to have in nearest future?</p>
        <label for="car">Car</label>
        <input type="checkbox" id="car" name="wishes[]" value="car">
        <label for="bicycle">Bicycle</label>
        <input type="checkbox" id="bicycle" name="wishes[]" value="bicycle">
        <label for="house">Own house</label>
        <input type="checkbox" id="house" name="wishes[]" value="house">
        <label for="job">Good job</label>
        <input type="checkbox" id="job" name="wishes[]" value="job">
        @error('wishes')
        <div style="background-color: red;">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <p>Email</p>
        <label for="email"></label>
        <input type="email" id="email" name="email">
<button type="button" onclick="checkEmailOnUniqueness(document.getElementById('email').value)">Check uniqueness</button>
        @error('email')
        <div style="background-color: red;">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit">Submit</button>
</form>
<script type="text/javascript">
    checkEmailOnUniqueness = (email) => {
        const headers = new Headers();
        headers.append('Content-Type', 'application/json');
        headers.append('Accept', 'application/json');
        const request = new Request(
            'http://localhost:880/api/email-check',
            {
                method: 'POST',
                body: JSON.stringify({ 'email': email }),
                headers: headers
            }
        );
        fetch(request)
            .then(response => response.json())
            .then(data => {
                if (data.errors) {
                    Object.values(data.errors).forEach(error => alert(error));
                } else {
                    alert(`Email is ${data.unique ? 'unique' : 'not unique'}`);
                }
            });
    }
</script>