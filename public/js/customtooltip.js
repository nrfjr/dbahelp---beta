Chart.Tooltip.positioners.custom = function(elements, eventPosition) {
    /** @type {Chart.Tooltip} */
    var tooltip = this;

    /* ... */

  return {
    x: eventPosition.x,
    y: eventPosition.y
      };
  }