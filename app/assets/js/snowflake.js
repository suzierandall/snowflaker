class Pixel extends React.Component {
	render() {
		return <td className="pixel">{this.props.pixel}</td>;
	}
}

class Row extends React.Component {
	render() {
		return(
			<tr>
			{
				this.props.pixels.map(function(pixel, i){
					return <Pixel pixel={pixel} key={i} />;
				})
			}
			</tr>
		);
	}
}

class Grid extends React.Component {
	render() {
		let rows = this.props.grid;
		return(
			<table className="grid">
				<tbody>
				{
					rows.map(function(row, i){
						return <Row pixels={row} key={i} />;
					})
				}
				</tbody>
			</table>
		);
	}
}
