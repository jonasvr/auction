@extends('layout.master')


@section('title')
    Isearch
@endsection


@section('container')
  @include('layout.header')

<div class="Search">
  <div class="row">
    <h2 class="col-md-offset-2 col-md-8">I search</h2>
    <div class="col-md-offset-2"></div>
  </div>

  <div class="row">
    <h3 class="col-md-offset-2 col-md-8">Add a request</h3>
    <div class="col-md-offset-2"></div>
  </div>

  <form>
    <div class="row blue-text">
      <div class="col-md-offset-2 col-md-8 row">
        <div class="form-group col-md-6">
          <label for="what">What are you looking for?</label>
          <input type="text" class="form-control" id="what" placeholder="what">
        </div>
        <div class="form-group col-md-6">
          <label for="what">Artist</label>
          <input type="text" class="form-control" id="artist" placeholder="artist">
        </div>
        <div class="form-group col-md-9">
          <label for="information"> Information about artwork</label>
          <input type="text" class="form-control" id="information" placeholder="information">
        </div>
        <div class="form-group col-md-3">
          <button class="btn text-uppercase admit"> admit request</button>
        </div>
        <div class="col-md-12 note"> Your request must be approved by the administrator. If your question has been approved, it will appear on our site. </div>
      </div> <div class="col-md-offset-2"></div>
    </div>
  </form>
</div>

<div class="overvieuw">
  <div class="row">
    <h4 class="col-md-offset-2 col-md-1"> Overview</h4>
    <!-- <p class="col-md-offset-6 col-md-1"> < 1 2 3 4 ></p> -->
    <nav class="col-md-offset-5 col-md-2">
      <ul class="pagination">
        <li>
          <a href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li>
          <a href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav>
    <div class="col-md-offset-2 col-md-9 row results">
        <div class="col-md-8">
          <p><strong>Search:</strong> Mona Lisa, Leonardo Da Vinci</p>
          <p><strong>Description:</strong> Lorem ipsum, dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut </p>
          <p><strong>Posted:</strong> 5 July 2013</p>
        </div>
        <a class="btn btn-default col-md-offset-1 col-md-2 grey-back blue-text" href="{{'isearch'}}"> I own this artwork ></a>
    </div>
    <div class="col-md-offset-2 col-md-9 row results">
        <div class="col-md-8">
          <p><strong>Search:</strong> Mona Lisa, Leonardo Da Vinci</p>
          <p><strong>Description:</strong> Lorem ipsum, dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut </p>
          <p><strong>Posted:</strong> 5 July 2013</p>
        </div>
        <a class="btn btn-default col-md-offset-1 col-md-2 grey-back blue-text" href="{{'isearch'}}"> I own this artwork ></a>
    </div>
    <div class="col-md-offset-2 col-md-9 row results">
        <div class="col-md-8">
          <p><strong>Search:</strong> Mona Lisa, Leonardo Da Vinci</p>
          <p><strong>Description:</strong> Lorem ipsum, dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut </p>
          <p><strong>Posted:</strong> 5 July 2013</p>
        </div>
        <a class="btn btn-default col-md-offset-1 col-md-2 grey-back blue-text" href="{{'isearch'}}"> I own this artwork ></a>
    </div>
    <div class="col-md-offset-2 col-md-9 row results">
        <div class="col-md-8">
          <p><strong>Search:</strong> Mona Lisa, Leonardo Da Vinci</p>
          <p><strong>Description:</strong> Lorem ipsum, dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut </p>
          <p><strong>Posted:</strong> 5 July 2013</p>
        </div>
        <a class="btn btn-default col-md-offset-1 col-md-2 grey-back blue-text" href="{{'isearch'}}"> I own this artwork ></a>
    </div>
    <div class="col-md-offset-2 col-md-9 row results">
        <div class="col-md-8">
          <p><strong>Search:</strong> Mona Lisa, Leonardo Da Vinci</p>
          <p><strong>Description:</strong> Lorem ipsum, dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut </p>
          <p><strong>Posted:</strong> 5 July 2013</p>
        </div>
        <a class="btn btn-default col-md-offset-1 col-md-2 grey-back blue-text" href="{{'isearch'}}"> I own this artwork ></a>
    </div>

  </div>
</div>

@endsection
