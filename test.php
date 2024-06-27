<!DOCTYPE html>
<html>
<head>
	   <!-- Bootstrap CSS -->
  <!--   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>


    <title>Hello, world!</title>
    <style >textarea.md-textarea-scroll{
  overflow-y: visible;
}
textarea.md-textarea {
  padding: 0;
  resize: none;
  min-height: 3rem;


}</style>
</head>
<body>
	<textarea class="form-control" name="editor1"></textarea>
	<script src="ckeditor/ckeditor.js"></script>
                <script>

                        CKEDITOR.replace( 'editor1' );
                </script>

                <div class="container">
    <div class="col-md-6">
        <div class="md-form">
            <input id="input_text" type="text" length="100">
            <label for="input_text">Title</label>
        </div>
        <div class="md-form">
            <textarea type="text" id="textarea" class="md-textarea"></textarea>
            <label for="textarea">Description</label>
        </div>
    </div>
</div>



  <select data-placeholder="Begin typing a name to filter..." multiple class="chosen-select" name="test">
    <option value=""></option>
    <option>American Black Bear</option>
    <option>Asiatic Black Bear</option>
    <option>Brown Bear</option>
    <option>Giant Panda</option>
    <option>Sloth Bear</option>
    <option>Sun Bear</option>
    <option>Polar Bear</option>
    <option>Spectacled Bear</option>
  </select>
  <input type="submit">



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<script type="">$(".chosen-select").chosen({
  no_results_text: "Oops, nothing found!"
})</script>

</body>
</html>