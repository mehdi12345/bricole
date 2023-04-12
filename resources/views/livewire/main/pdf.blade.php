<html style=" font: 16px/1 'Open Sans', sans-serif; overflow: auto; padding: 0.5in;background: #999; cursor: default;">
	<head>
		<meta charset="utf-8">
		<title>Invoice</title>
	</head>
	<body style="  background: #fff; border-radius: 1px; box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5); box-sizing: border-box; height: 11in; margin: 0 auto; overflow: hidden; padding: 0.5in; width: 8.5in;" >
	<div style="text-align: center;">
	<img src="{{ $image  }}" alt="logo" style="width: 128px; height: 128px; "/>
	</div>
	<header>
			<h1 style=" background: #000; border-radius: 0.25em; color: #fff; margin: 0 0 1em; padding: 0.5em 0; font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase;">Project chart</h1>
			<div >
			<div>
				<table style="  font-size: 75%;table-layout: fixed;border-collapse: separate;border-spacing: 2px; width: 100%;">
					<th>
						<p>{{$name}}</p>
						<p>{{$email}}</p>
						<p>{{$phone}}</p>
					</th>
					<th>
					<img src="{{ $imageGig  }}" alt="logo" style="width: 128px; height: 128px; border-radius: 10%;"/>
					</th>
					<th>
					<p>{{$title}}</p>
						<p>{{$ville}}</p>
						<p>{{$area}}</p>
					</th>
				</table>
			</div>
			</div>
		</header>
		<div>
			<!-- <h3>Recipient</h3>
			<div >
				<p>Some Company<br>c/o Some Guy</p>
			</div> -->
			<table style="  clear: both;content: '';display: table;width: 36%;">
				<tr>
					<th style=" border-radius: 0.25em;border-style: solid;  border-width: 1px;padding: 0.5em;position: relative;text-align: left;background: #eee;border-color: #bbb;background: #eee;border-color: #bbb; width: 40%;"><span >Project chart #</span></th>
					<td style="  border-color: #ddd; border-width: 1px;padding: 0.5em;position: relative;text-align: left; border-radius: 0.25em;border-style: solid; width: 60%;border-width: 1px; padding: 0.5em; position: relative; text-align: left;  border-radius: 0.25em; border-style: solid; "><span >101138</span></td>
				</tr>
				<tr>
					<th style=" border-radius: 0.25em;border-style: solid;  border-width: 1px;padding: 0.5em;position: relative;text-align: left;background: #eee;border-color: #bbb;background: #eee;border-color: #bbb; width: 40%;"><span >Date</span></th>
					<td style="  border-color: #ddd; border-width: 1px;padding: 0.5em;position: relative;text-align: left; border-radius: 0.25em;border-style: solid; width: 60%;border-width: 1px; padding: 0.5em; position: relative; text-align: left;  border-radius: 0.25em; border-style: solid;"><span >{{$createAt}}</span></td>
				</tr>
				<!-- <tr>
					<th style=" border-radius: 0.25em; border-style: solid;  border-width: 1px; padding: 0.5em; position: relative; text-align: left;background: #eee; border-color: #bbb;background: #eee;border-color: #bbb; width: 40%;"><span >Amount Due</span></th>
					<td style="  border-color: #ddd; border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; width: 60%;border-width: 1px; padding: 0.5em; position: relative; text-align: left;  border-radius: 0.25em; border-style: solid; "><span>600.00</span><span id="prefix" > DH</span></td>
				</tr> -->
			</table>
			<table class="inventory" style="  font-size: 75%;table-layout: fixed;border-collapse: separate;border-spacing: 2px; width: 100%;"  >
				<thead>
					<tr>
						<th style=" border-radius: 0.25em; border-style: solid;  border-width: 1px; padding: 0.5em; position: relative; text-align: left;background: #eee; border-color: #bbb;background: #eee;border-color: #bbb; width: 40%;"><span >Name worker</span></th>
						<th style=" border-radius: 0.25em; border-style: solid;  border-width: 1px; padding: 0.5em; position: relative; text-align: left;background: #eee; border-color: #bbb;background: #eee;border-color: #bbb; width: 40%;"><span >Description</span></th>
						<th style=" border-radius: 0.25em; border-style: solid;  border-width: 1px; padding: 0.5em; position: relative; text-align: left;background: #eee; border-color: #bbb;background: #eee;border-color: #bbb; width: 40%;"><span >Date to</span></th>
						<th style=" border-radius: 0.25em; border-style: solid;  border-width: 1px; padding: 0.5em; position: relative; text-align: left;background: #eee; border-color: #bbb;background: #eee;border-color: #bbb; width: 40%;"><span >Date form</span></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td style="  border-color: #ddd; border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; width: 60%;border-width: 1px; padding: 0.5em; position: relative; text-align: left;  border-radius: 0.25em; border-style: solid; "><span >{{$name_seller}}</span></td>
						<td style="  border-color: #ddd; border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; width: 60%;border-width: 1px; padding: 0.5em; position: relative; text-align: left;  border-radius: 0.25em; border-style: solid; "><span >{{$descreption}}</span></td>
						<td style="  border-color: #ddd; border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; width: 60%;border-width: 1px; padding: 0.5em; position: relative; text-align: left;  border-radius: 0.25em; border-style: solid; "><span>{{$date_to}}</span></td>
						<td style="  border-color: #ddd; border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; width: 60%;border-width: 1px; padding: 0.5em; position: relative; text-align: left;  border-radius: 0.25em; border-style: solid; "><span >{{$date_form}}</span></td>
					</tr>
				</tbody>
			</table>

			<table  class="inventory" style="  font-size: 75%;table-layout: fixed;border-collapse: separate;border-spacing: 2px; width: 100%;  float: right; width: 36%;" >
				<tr>
					<th style=" border-radius: 0.25em; border-style: solid;  border-width: 1px; padding: 0.5em; position: relative; text-align: left;background: #eee; border-color: #bbb;background: #eee;border-color: #bbb; width: 40%;"><span >Total</span></th>
					<td style="  border-color: #ddd; border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; width: 60%;border-width: 1px; padding: 0.5em; position: relative; text-align: left;  border-radius: 0.25em; border-style: solid; "><span>{{ $price }}</span><span data-prefix> DH</span></td>
				</tr>
				<!-- <tr>
					<th style=" border-radius: 0.25em; border-style: solid;  border-width: 1px; padding: 0.5em; position: relative; text-align: left;background: #eee; border-color: #bbb;background: #eee;border-color: #bbb; width: 40%;"><span >Amount Paid</span></th>
					<td style="  border-color: #ddd; border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; width: 60%;border-width: 1px; padding: 0.5em; position: relative; text-align: left;  border-radius: 0.25em; border-style: solid; "><span >0.00</span><span data-prefix> DH</span></td>
				</tr>
				<tr>
					<th style=" border-radius: 0.25em; border-style: solid;  border-width: 1px; padding: 0.5em; position: relative; text-align: left;background: #eee; border-color: #bbb;background: #eee;border-color: #bbb; width: 40%;"><span >Balance Due</span></th>
					<td style="  border-color: #ddd; border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; width: 60%;border-width: 1px; padding: 0.5em; position: relative; text-align: left;  border-radius: 0.25em; border-style: solid; "><span>600.00</span><span data-prefix> DH</span></td>
				</tr> -->
			</table>
		</div>

	</body>
</html>
