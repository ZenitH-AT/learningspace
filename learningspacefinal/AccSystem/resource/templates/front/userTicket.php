<div class="container">
    <div class=" col-sm-4 col-lg-4 col-md-4"></div>
    <div class="row">
        <div class="col-md-6">
            <div class="well well-sm">
                <form class="form-horizontal" method="post">
                    <fieldset>
                        <legend class="header col-md-10">Create new ticket</legend>
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <input id="phone" name="phone" type="text" placeholder="Subject" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <textarea class="form-control" id="message" name="message" placeholder="Message" rows="7" required></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <select class="combobox form-control">
                                    <option value="" selected="selected">Select category</option>
                                    <option value="EFT">Complaint</option>
                                    <option value="CC">Sales</option>
                                    <option value="XX">Other</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class=" btn btn-outline-success formbutton">Create ticket</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="well well-sm">
                <form class="form-horizontal" method="post">
                    <fieldset>
                        <legend class="header col-md-10">Your tickets</legend>

                        <legend class="header col-md-10" style="font-size:110%;">Subject: Noise coming from room 016</legend>
                        <p class="col-md-10 text-secondary">Ticket ID: SF2342FD</p>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                >ticket's conversation messages here<
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <textarea class="form-control" id="message" name="message" placeholder="Reply to ticket" rows="7" required></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class=" btn btn-outline-success formbutton" style="margin-right: 5%">Reply to ticket</button>
                            </div>
                        </div>

                        <legend class="header col-md-10" style="font-size:110%; margin-top: 10%">Subject: Payment won't go through</legend>
                        <p class="col-md-10 text-secondary">Ticket ID: SDG3454</p>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                >ticket's conversation messages here<
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <textarea class="form-control" id="message" name="message" placeholder="Reply to ticket" rows="7" required></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class=" btn btn-outline-success formbutton" style="margin-right: 5%">Reply to ticket</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>