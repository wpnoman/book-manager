import React from "react";
import { Button, IconButton } from "@material-tailwind/react";
import { ArrowRightIcon, ArrowLeftIcon } from "@heroicons/react/24/outline";
import { useState } from "@wordpress/element";

export function Pagination({ maxPage, setcurrentPage }) {

  const [active, setActive] = useState(1);

  const getItemProps = (index) =>
  ({
    variant: active === index ? "filled" : "text",
    color: "gray",
    onClick: () => {
      setActive(index);
      setcurrentPage(index)
    },
  });

  const next = () => {
    if (active === maxPage) return;

    setActive(active + 1);
    setcurrentPage(active + 1 )
  };

  const prev = () => {
    if (active === 1) return;

    setActive(active - 1);
    setcurrentPage(active - 1)
  };

  const pages = Array.from({ length: maxPage }, (_, i) => i + 1);


  return (
    <div className="flex items-center gap-4 mt-4">
      <Button
        variant="text"
        className="flex items-center gap-2"
        onClick={prev}
        disabled={active === 1}
      >
        <ArrowLeftIcon strokeWidth={2} className="h-4 w-4" /> Previous
      </Button>
      <div className="flex items-center gap-2">
        {
          pages.map((item) => {
            return (<IconButton {...getItemProps(item)}>{item}</IconButton>)
          })
        }
      </div>
      <Button
        variant="text"
        className="flex items-center gap-2"
        onClick={next}
        disabled={active === maxPage}
      >
        Next
        <ArrowRightIcon strokeWidth={2} className="h-4 w-4" />
      </Button>
    </div>
  );
}