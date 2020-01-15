<div class="card border-0 mt-3">
    <div class="card-body">
        <form action="{{action("ConsultationController@store")}}" method="post">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Email</label>
                  <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email">
                  <small id="passwordHelpBlock" class="form-text text-muted">
                        Please provide a phone or email address you'd like us to contact you with. 
                        Leave both fields empty if you would like us to contact you through the email address you signed up with.
                   </small>
                </div>
                <div class="form-group col-md-6">
                  <label for="phone">Phone</label>
                  <input type="number" class="form-control" name="phone" placeholder="Phone">
                </div>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Subject</label>
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Message Subject">
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Message</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" name="message" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary float-right">Submit</button>
          </form>
    </div>
</div>