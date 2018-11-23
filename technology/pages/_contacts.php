  <section id="contact-page" class="container">
        <div class="row">
            <div class="col-sm-12">
                <h4>Обратная связь</h4>
                <div class="status alert alert-success" style="display: none"></div>
                <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="sendemail.php" role="form">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" placeholder="Имя">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" placeholder="Фамилия">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" placeholder="E-Mail">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg">Отправить сообщение</button>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Текст сообщения"></textarea>
                        </div>
                    </div>
                </form>
            </div><!--/.col-sm-12-->
        </div>
    </section><!--/#contact-page-->