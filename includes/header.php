<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $title ?? 'Lab 8'; ?></title>

    
    <link rel="stylesheet" href="css/bootstrap.css">

    
    <link rel="stylesheet" href="css/style.css">

    
    <style>
      h1.page-title {
        color: #c61a1aff;
        font-weight: 400;
        margin-bottom: 1rem;
        text-align: center;
      }
      .btn-submit {
        background: #635bff;
        border: 0;
        padding: .6rem 1rem;
        font-weight: 600;
        border-radius: .6rem;
      }
      .cta-view {
        display: block;
        width: 100%;
        text-align: center;
        background: #00d0ea;
        color: #fff;
        padding: .9rem 1rem;
        border-radius: .6rem;
        text-decoration: none;
        font-weight: 600;
        margin-top: 1.5rem;
      }
      .cta-split { margin-top: .8rem; }
      .cta-key {
        background: #baf182ff;
        color: #285002ff;
        text-align: center;
        padding: .9rem 1rem;
        font-weight: 600;
        border-top-left-radius: .6rem;
        border-bottom-left-radius: .6rem;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .cta-delete {
        display: block;
        width: 100%;
        text-align: center;
        background: #dc3545;
        color: #fff;
        padding: .9rem 1rem;
        text-decoration: none;
        font-weight: 600;
        border-top-right-radius: .6rem;
        border-bottom-right-radius: .6rem;
      }
      .actions-wrap {
        max-width: 900px;
        margin: 1.2rem auto 0;
      }
    </style>
  </head>

  <body>
    <div class="container mt-4">
